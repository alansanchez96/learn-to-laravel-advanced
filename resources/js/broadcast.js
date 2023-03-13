const userId = document.querySelector('#userId').value;
const toast = document.querySelector('#toast');

window.Echo.channel('created-product-channel')
    .listen('.CreatedProduct', (data) => {
        toastNotify(toast, data.message);
        setTimeout(() => {
            toast.innerHTML = null;
        }, 5000);
    })

window.Echo.channel('email-submitted-channel')
    .listen('.EmailSubmitted', data => {
        toastNotify(toast, data.message);
        setTimeout(() => {
            toast.innerHTML = null;
        }, 5000);
    })

window.Echo.private(`file-upload-channel.${userId}`)
    .listen('.FileUpload', data => {
        toastNotify(toast, data.message);
        setTimeout(() => {
            toast.innerHTML = null;
        }, 5000);
    })

function toastNotify(element, message) {
    element.innerHTML = `<div id="toast-success"
    class="flex absolute z-50 bottom-5 right-5 items-center w-full max-w-xs p-4 mb-4 text-gray-100 bg-gray-800 rounded-xl shadow"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">${message}</div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 text-gray-400 hover:text-rose-500 focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8"
        data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
</div>
`;
}


