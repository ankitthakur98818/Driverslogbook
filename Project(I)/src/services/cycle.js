let driveInterval, breakInterval;

function startTimer(elementId, duration) {
    let timer = duration, minutes, seconds;
    const element = document.getElementById(elementId);
    return setInterval(() => {
        minutes = Math.floor(timer / 60);
        seconds = timer % 60;
        element.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        if (--timer < 0) {
            clearInterval(interval);
        }
    }, 1000);
}

document.getElementById("start-driving").addEventListener("click", () => {
    // Stop the break timer if it's running
    if (breakInterval) {
        clearInterval(breakInterval);
    }
    // Start the driving timer
    clearInterval(driveInterval); // Ensure no duplicate timers
    driveInterval = startTimer("drive-time", 18 * 60 * 60 ); // Example: 18 hours
});

document.getElementById("start-break").addEventListener("click", () => {
    // Stop the driving timer if it's running
    if (driveInterval) {
        clearInterval(driveInterval);
    }
    // Start the break timer
    clearInterval(breakInterval); // Ensure no duplicate timers
    breakInterval = startTimer("break-time", 20 * 60 * 60); // Example: 2 hours
});

document.getElementById("stop-timer").addEventListener("click", () => {
    // Stop and start  where they left
    clearInterval(driveInterval);
    clearInterval(breakInterval);
    
});
