export class ChatManager {
    constructor(currentChatId) {
        this.currentChatId = currentChatId;
        this.messagesContainer = document.getElementById('messages-feed');
        this.inputField = document.getElementById('message-input');
        this.sendBtn = document.getElementById('send-btn');
        this.backBtn = document.getElementById('back-to-contacts');
        this.layout = document.querySelector('.chat-layout');
        
        this.init();
    }

    init() {
        console.log("Chat Manager Iniciado. ID activo:", this.currentChatId);
        
        // 1. Cargar lista de contactos (Sidebar)
        this.loadContactList();

        // 2. Si hay un ID seleccionado, cargar sus mensajes
        if (this.currentChatId) {
            this.loadMessages(this.currentChatId);
            this.setupEventListeners();
            this.layout.classList.add('mobile-chat-active');
            // Opcional: Polling para actualizar mensajes nuevos cada 3 segundos
            setInterval(() => this.loadMessages(this.currentChatId, false), 3000);
        }else{
            this.layout.classList.remove('mobile-chat-active');
        }
    }

    async loadContactList() {
        try {
            const response = await fetch('get_chat.php');
            const users = await response.json();
            
            const listContainer = document.getElementById('contacts-list');
            listContainer.innerHTML = ""; 

            users.forEach(user => {
                const isActive = (user.id == this.currentChatId) ? 'active' : '';

                if (user.id == this.currentChatId) {
                    this.updateHeaderInfo(user);
                }

                const item = document.createElement('div');
                item.className = `contact-item ${isActive}`;
                item.onclick = () => window.location.href = `?id=${user.id}`;
                
                item.innerHTML = `
                    <img src="${user.avatar}" alt="User">
                    <div class="contact-info">
                        <div class="contact-top">
                            <h4>${user.nombre}</h4>
                            <span class="time">${user.time}</span>
                        </div>
                        <p class="last-message">${user.last_message}</p>
                    </div>
                `;
                listContainer.appendChild(item);
            });

        } catch (error) {
            console.error("Error cargando contactos:", error);
        }
    }

    updateHeaderInfo(user) {
        const headerName = document.getElementById('current-chat-name');
        const headerImg = document.getElementById('current-chat-img');

        if(headerName) headerName.textContent = user.nombre;
        if(headerImg) headerImg.src = user.avatar;
    }

    async loadMessages(id, shouldScroll = true) {
        try {
            // Fetch real a la base de datos
            const response = await fetch(`get_messages.php?id=${id}`);
            const messages = await response.json();

            // Si es recarga automática (polling) y no hay cambios, no hagas nada
            // (Aquí simplificado: siempre borramos y repintamos por seguridad)
            this.messagesContainer.innerHTML = ""; 

            messages.forEach(msg => {
                this.renderBubble(msg.text, msg.type, msg.time);
            });

            if(shouldScroll) this.scrollToBottom();

        } catch (error) {
            console.error("Error cargando mensajes:", error);
        }
    }

    setupEventListeners() {
        this.sendBtn.addEventListener('click', () => this.sendMessage());

        this.inputField.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.sendMessage();
        });

        if(this.backBtn) {
            this.backBtn.addEventListener('click', () => {
                // Quitamos el ID de la URL para volver a la lista
                window.location.href = window.location.pathname;
            });
        }
    }

    async sendMessage() {
        const text = this.inputField.value;
        if (!text.trim()) return;

        // 1. UI Optimista: Muestra el mensaje inmediatamente
        // Calculamos la hora actual para mostrarla ya
        const timeNow = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        this.renderBubble(text, 'sent', timeNow);
        
        // Limpiar input y scroll
        this.inputField.value = '';
        this.scrollToBottom();

        try {
            // 2. Envío real al Backend
            await fetch('send_message.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    receptor_id: this.currentChatId,
                    mensaje: text
                })
            });
            
            // Opcional: Recargar sidebar para actualizar "último mensaje"
            this.loadContactList();

        } catch (error) {
            console.error("Error enviando mensaje:", error);
            alert("Error al enviar mensaje");
        }
    }

    renderBubble(text, type, timeStr) {
        const bubble = document.createElement('div');
        bubble.classList.add('bubble', type);
        
        const time = timeStr || new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        bubble.innerHTML = `
            <p>${text}</p>
            <span class="msg-time">${time}</span>
        `;

        this.messagesContainer.appendChild(bubble);
    }

    scrollToBottom() {
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const chatId = urlParams.get('id');
    new ChatManager(chatId);
});