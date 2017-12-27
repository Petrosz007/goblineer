//let isOffline = false;
window.addEventListener('load', checkConnectivity);

// when the page has finished loading,
// listen for future changes in connection
function checkConnectivity() {
  updateStatus();
  window.addEventListener('online', updateStatus);
  window.addEventListener('offline', updateStatus);
}

// check if we're online, set a class on <html> if not
function updateStatus() {
  const notification = document.querySelector('#offline-notification');
  if (!navigator.onLine) {
    notification.style.display = 'block';
  } else {
    notification.style.display = 'none';
  }
}