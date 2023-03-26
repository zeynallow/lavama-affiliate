function showLiveToaster(type, title, message) {
    var toaster = document.getElementById('liveToast');

    toaster.classList.remove('success', 'error');
    toaster.classList.add(type);
    toaster.querySelector('.toast-title').innerHTML = title;
    toaster.querySelector('.toast-body').innerHTML = message;

    var visibleToast = new bootstrap.Toast(toaster, {'autohide': true, 'delay': 3000});
    visibleToast.show();
}
