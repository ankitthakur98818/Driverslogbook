let isDriving = false;
let driveSeconds = 0;
let idleSeconds = 0;

const timerDisplay = document.getElementById('timer');
const driveTimeDisplay = document.getElementById('drive-time');
const idleTimeDisplay = document.getElementById('idle-time');
const toggleButton = document.getElementById('toggle-drive');
const statusLabel = document.getElementById('status-label');
// Function to format time as MM:SS
function formatTime(seconds) {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

// Update timers every second
setInterval(() => {
    if (isDriving) {
        driveSeconds++;
        timerDisplay.textContent = formatTime(driveSeconds);
        driveTimeDisplay.textContent = `${Math.floor(driveSeconds / 3600)}h ${Math.floor((driveSeconds % 3600) / 60)}min`;
    } else {
        idleSeconds++;
        idleTimeDisplay.textContent = `${idleSeconds}sec`;
    }
}, 1000);

// Toggle Driving/Stationary status
toggleButton.addEventListener('click', () => {
    isDriving = !isDriving;
    toggleButton.textContent = isDriving ? 'DRIVING' : 'STATIONARY';
    toggleButton.classList.toggle('driving', isDriving);
    toggleButton.classList.toggle('stationary', !isDriving);
    if (isDriving) {
        statusLabel.textContent = 'IN DRIVING';
        statusLabel.classList.remove('in-stationary');
        statusLabel.classList.add('in-driving');
    } else {
        statusLabel.textContent = 'IN STATIONARY';
        statusLabel.classList.remove('in-driving');
        statusLabel.classList.add('in-stationary');
    }
});
