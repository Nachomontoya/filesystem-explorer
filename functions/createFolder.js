const open = document.getElementById('createFolder');
const modalContainer = document.getElementById('modal-container');
const close = document.getElementById('closeModal');
const modal = document.getElementById('createFolderModal');

open.addEventListener('click', () => {
    modalContainer.classList.remove('show');
    modal.classList.remove('show');
    
});

close.addEventListener('click', () => {
    modalContainer.classList.add('show');
    modal.classList.add('show');

});