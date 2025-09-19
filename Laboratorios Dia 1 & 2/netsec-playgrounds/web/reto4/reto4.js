// reto4.js
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('ports-table-body');
    const logs = document.getElementById('activity-log');
    const flagBox = document.getElementById('flag-box');

    let ports = [];
    let trafficInterval;

    // Cargar configuración inicial desde ports.json
    fetch('ports.json')
        .then(response => response.json())
        .then(data => {
            ports = data;
            renderPorts();
            simulateSuspiciousTraffic();
        });

    function renderPorts() {
        tableBody.innerHTML = '';

        ports.forEach(port => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${port.port} (${port.name})</td>
                <td class="${getStatusClass(port.status)}">${capitalize(port.status)}</td>
                <td>
                    <button class="block" onclick="updatePort(${port.port}, 'blocked')">Bloquear</button>
                    <button class="allow" onclick="updatePort(${port.port}, 'allowed')">Permitir</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    function getStatusClass(status) {
        switch (status) {
            case 'safe': return 'status-safe';
            case 'suspicious': return 'status-suspicious';
            case 'malicious': return 'status-malicious';
            default: return '';
        }
    }

    function capitalize(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    }

    window.updatePort = function(portNumber, action) {
        const port = ports.find(p => p.port === portNumber);

        if (action === 'blocked') {
            port.status = 'safe';
            addLog(`Puerto ${portNumber} bloqueado con éxito.`);
        } else if (action === 'allowed') {
            addLog(`Se ha permitido el tráfico en el puerto ${portNumber}.`);
        }

        renderPorts();
        checkVictory();
    };

    function addLog(message) {
        const li = document.createElement('li');
        li.textContent = `[${new Date().toLocaleTimeString()}] ${message}`;
        logs.appendChild(li);
    }

    function simulateSuspiciousTraffic() {
        trafficInterval = setInterval(() => {
            const backdoorPort = ports.find(p => p.port === 4444);

            if (backdoorPort.status !== 'safe') {
                addLog(`⚠️ Tráfico sospechoso detectado en puerto ${backdoorPort.port}`);
            }
        }, 4000);
    }

    function checkVictory() {
        if (ports.every(p => p.status === 'safe')) {
            clearInterval(trafficInterval);
            addLog('Todos los puertos están seguros. Servidor protegido.');
            flagBox.style.display = 'block';
            flagBox.textContent = 'FLAG{SERVER_CLEANED_SUCCESSFULLY}';
        }
    }
});
