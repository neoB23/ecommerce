/* Configuration and Defaults */
const defaultConfig = {
  page_title: "Kick Craze",
  tagline: "Your ultimate destination for sneaker culture",
  login_title: "Welcome Back",
  register_title: "Create Account",
  login_button: "Sign In",
  register_button: "Create Account",
  
  primary_color: "#050505", 
  secondary_color: "#2C2C2C",
  background_color: "#F3F4F6", 
  text_color: "#1f2937",
  accent_color: "#FFFFFF"
};

/* DOM Elements */
const loginTab = document.getElementById('login-tab');
const registerTab = document.getElementById('register-tab');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const loginSubmitForm = document.getElementById('login-submit-form');
const registerSubmitForm = document.getElementById('register-submit-form');
const loginMessage = document.getElementById('login-message');
const registerMessage = document.getElementById('register-message');

/* Tab Switching Logic */
function switchToLogin() {
  loginTab.classList.add('bg-white', 'text-kick-black', 'shadow-sm', 'border', 'border-gray-200');
  loginTab.classList.remove('text-gray-500', 'hover:text-kick-black');
  
  registerTab.classList.remove('bg-white', 'text-kick-black', 'shadow-sm', 'border', 'border-gray-200');
  registerTab.classList.add('text-gray-500', 'hover:text-kick-black');
  
  loginForm.classList.remove('hidden');
  loginForm.classList.add('fade-in');
  registerForm.classList.add('hidden');
}

function switchToRegister() {
  registerTab.classList.add('bg-white', 'text-kick-black', 'shadow-sm', 'border', 'border-gray-200');
  registerTab.classList.remove('text-gray-500', 'hover:text-kick-black');
  
  loginTab.classList.remove('bg-white', 'text-kick-black', 'shadow-sm', 'border', 'border-gray-200');
  loginTab.classList.add('text-gray-500', 'hover:text-kick-black');
  
  registerForm.classList.remove('hidden');
  registerForm.classList.add('fade-in');
  loginForm.classList.add('hidden');
}

/* Event Listeners */
loginTab.addEventListener('click', switchToLogin);
registerTab.addEventListener('click', switchToRegister);

// Login Handler
loginSubmitForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = document.getElementById('login-email').value;
  
  loginMessage.textContent = `Login successful! Welcome back, ${email}`;
  loginMessage.className = 'mt-4 p-3 rounded-lg bg-gray-800 text-white border border-gray-700 shadow-lg';
  loginMessage.classList.remove('hidden');
  
  setTimeout(() => {
    loginMessage.classList.add('hidden');
  }, 3000);
});

// Registration Handler
registerSubmitForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const firstname = document.getElementById('register-firstname').value;
  const password = document.getElementById('register-password').value;
  const confirm = document.getElementById('register-confirm').value;
  
  // Removed role check because the dropdown was removed from HTML
  
  if (password !== confirm) {
    registerMessage.textContent = 'Passwords do not match!';
    registerMessage.className = 'mt-4 p-3 rounded-lg bg-red-50 text-red-700 border border-red-200';
    registerMessage.classList.remove('hidden');
    return;
  }
  
  registerMessage.textContent = `Account created successfully! Welcome to Kick Craze, ${firstname}!`;
  registerMessage.className = 'mt-4 p-3 rounded-lg bg-gray-800 text-white border border-gray-700 shadow-lg';
  registerMessage.classList.remove('hidden');
  
  setTimeout(() => {
    registerMessage.classList.add('hidden');
    switchToLogin();
  }, 3000);
});

/* SDK Integration (Keep existing SDK code) */
async function onConfigChange(config) {
  // ... (keep existing SDK logic)
}

if (window.elementSdk) {
  window.elementSdk.init({
    defaultConfig,
    onConfigChange
    // ... (keep existing SDK config)
  });
}

