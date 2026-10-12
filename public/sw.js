self.addEventListener('push', function (event) {
    let data = {};

    if (event.data) {
        data = event.data.json();
    }

    const title = data.title || 'IPK Planner';

    const options = {
        body: data.body || 'Jangan lupa jadwal belajarmu, ya!',
        icon: '/favicon.ico',
        data: {
            url: data.url || '/dashboard'
        }
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

self.addEventListener('notificationclick', function (event) {
    event.notification.close();

    const url = event.notification.data.url || '/dashboard';

    event.waitUntil(
        clients.openWindow(url)
    );
});