import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const del_buttons = document.querySelectorAll('.project-remove')
const del_type_buttons = document.querySelectorAll('.type-remove')

del_buttons.forEach((btn) => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        const modal = document.getElementById('project-delete-modal');
        let new_modal = new bootstrap.Modal(modal)
        new_modal.show()

        const data_proj = btn.getAttribute('data-proj')

        const alert = document.getElementById('modal-alert');
        alert.innerHTML = `Are you sure you want to delete ${data_proj} project from your portfolio? <strong>The action is irreversible</strong>.`

        const confirm = document.getElementById('confirm-del')
        confirm.addEventListener('click', function () {
        btn.parentElement.submit();
    })
    })
})

del_type_buttons.forEach((btn) => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        const modal = document.getElementById('type-delete-modal');
        let new_modal = new bootstrap.Modal(modal)
        new_modal.show()

        const data_type = btn.getAttribute('data-type')

        const alert = document.getElementById('modal-alert-2');
        alert.innerHTML = `Are you sure you want to delete ${data_type} type? <strong>The action is irreversible</strong>.`

        const confirm = document.getElementById('confirm-type-del')
        confirm.addEventListener('click', function () {
        btn.parentElement.submit();
    })
    })
})