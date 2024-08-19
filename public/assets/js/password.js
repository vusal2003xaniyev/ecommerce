const toggleIconeye = document.querySelector("#eye");
const toggleIconeyeslash = document.querySelector("#eye-slash");
const input = document.querySelector("#passwordInput");
const inputRepeater = document.querySelector("#password_input_repeater");
toggleIconeye.addEventListener("click", toggleVisibilityEye);
toggleIconeyeslash.addEventListener("click", toggleVisibilityEyeslash);

function toggleVisibilityEye() {
    input.type = "text";
    toggleIconeye.classList.add("hidden");
    toggleIconeyeslash.classList.remove("hidden");
}

function toggleVisibilityEyeslash() {
    input.type = "password";
    toggleIconeye.classList.remove("hidden");
    toggleIconeyeslash.classList.add("hidden");
}
const toggleIconeyeRepeater = document.querySelector("#eyeRepeater");
const toggleIconeyeslashRepeater = document.querySelector("#eye-slashRepeater");
toggleIconeyeRepeater.addEventListener("click", toggleVisibilityEyeRepeater);
toggleIconeyeslashRepeater.addEventListener("click", toggleVisibilityEyeslashRepeater);
function toggleVisibilityEyeRepeater() {
    inputRepeater.type = "text";
    toggleIconeyeRepeater.classList.add("hidden");
    toggleIconeyeslashRepeater.classList.remove("hidden");
}

function toggleVisibilityEyeslashRepeater() {
    inputRepeater.type = "password";
    toggleIconeyeRepeater.classList.remove("hidden");
    toggleIconeyeslashRepeater.classList.add("hidden");
}
