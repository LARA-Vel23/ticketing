import './bootstrap';
import $ from "jquery";
import * as bootstrap from 'bootstrap';
import {Modal} from 'bootstrap';

window.$ = $;

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

import '../sass/app.scss';

$(document).ready(function() {
    let modalsElement = document.getElementById('livewire-bootstrap-modal');

    modalsElement.addEventListener('hidden.bs.modal', () => {
        Livewire.dispatch('resetModal');
    });

    Livewire.on('showBootstrapModal', (e) => {
        let modal = Modal.getOrCreateInstance(modalsElement);
        modal.show();
    });

    Livewire.on('hideModal', () => {
        let modal = Modal.getInstance(modalsElement);
        modal.hide();
        Livewire.dispatch('resetModal');
    });
});
