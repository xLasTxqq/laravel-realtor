let select = document.getElementById('Input7');
let processed1 = document.getElementById('processed1');
let processed2 = document.getElementById('processed2');
let inputprocessed1 = document.getElementById('Input8');
let inputprocessed2 = document.getElementById('Input9');

select.addEventListener('change', () => {
    if (select.value === "processed") {
        processed1.classList.remove("d-none");
        processed2.classList.remove("d-none");
        inputprocessed1.required = true;
        inputprocessed2.required = true;
    } else {
        processed1.classList.add("d-none");
        processed2.classList.add("d-none");
        inputprocessed1.required = false;
        inputprocessed2.required = false;
    }
})