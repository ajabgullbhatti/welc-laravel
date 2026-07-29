const menuButton = document.getElementById('menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const menuIcon = document.getElementById('menu-icon');
const authDialog = document.getElementById('auth-dialog');
const authViews = {
  login: document.getElementById('login-view'),
  register: document.getElementById('register-view'),
  account: document.getElementById('account-view'),
};
const accountButtons = document.querySelectorAll('[data-account-button]');
const signInButtons = document.querySelectorAll('[data-auth-open]');
const authMessage = document.getElementById('auth-message');

let currentUser = null;

function setMenu(open) {
  menuButton.setAttribute('aria-expanded', String(open));
  menuButton.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
  menuIcon.textContent = open ? '\u00d7' : '\u2261';
  mobileMenu.classList.toggle('hidden', !open);
}

function showMessage(message = '', type = 'error') {
  authMessage.textContent = message;
  authMessage.className = message ? `auth-message auth-message-${type}` : 'auth-message hidden';
}

function showView(viewName) {
  Object.entries(authViews).forEach(([name, view]) => {
    view.classList.toggle('hidden', name !== viewName);
  });
  showMessage();
}

function updateAuthUI(user) {
  currentUser = user;

  signInButtons.forEach((button) => button.classList.toggle('hidden', Boolean(user)));
  accountButtons.forEach((button) => {
    button.classList.toggle('hidden', !user);
    if (user) {
      const label = button.querySelector('[data-account-label]');
      const initial = button.querySelector('[data-account-initial]');
      if (label) label.textContent = user.name.split(' ')[0];
      if (initial) initial.textContent = user.name.charAt(0).toUpperCase();
    }
  });

  if (user) {
    document.getElementById('account-name').textContent = user.name;
    document.getElementById('account-email').textContent = user.email;
    document.getElementById('account-initial').textContent = user.name.charAt(0).toUpperCase();
  }
}

function openAuth(viewName = currentUser ? 'account' : 'login') {
  showView(viewName);
  authDialog.showModal();
  document.body.classList.add('overflow-hidden');
}

function closeAuth() {
  authDialog.close();
  document.body.classList.remove('overflow-hidden');
}

async function request(url, options = {}) {
  const response = await fetch(url, {
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
      ...options.headers,
    },
    ...options,
  });

  const payload = await response.json().catch(() => ({}));
  if (!response.ok) {
    throw new Error(payload.error || 'Something went wrong. Please try again.');
  }

  return payload;
}

async function loadSession() {
  try {
    const payload = await request('/api/auth/me');
    updateAuthUI(payload.user);
  } catch {
    updateAuthUI(null);
  }
}

async function submitAuthForm(form, endpoint) {
  const submitButton = form.querySelector('button[type="submit"]');
  const formData = new FormData(form);
  const body = Object.fromEntries(formData.entries());

  submitButton.disabled = true;
  submitButton.textContent = endpoint.endsWith('register') ? 'Creating account...' : 'Signing in...';
  showMessage();

  try {
    const payload = await request(endpoint, {
      method: 'POST',
      body: JSON.stringify(body),
    });
    updateAuthUI(payload.user);
    showView('account');
    form.reset();
    showMessage(endpoint.endsWith('register') ? 'Your account is ready.' : 'Welcome back.', 'success');
  } catch (error) {
    showMessage(error.message);
  } finally {
    submitButton.disabled = false;
    submitButton.textContent = endpoint.endsWith('register') ? 'Create account' : 'Sign in';
  }
}

menuButton.addEventListener('click', () => {
  setMenu(menuButton.getAttribute('aria-expanded') !== 'true');
});

mobileMenu.querySelectorAll('a').forEach((link) => {
  link.addEventListener('click', () => setMenu(false));
});

signInButtons.forEach((button) => button.addEventListener('click', () => openAuth('login')));
accountButtons.forEach((button) => button.addEventListener('click', () => openAuth('account')));
document.querySelectorAll('[data-auth-view]').forEach((button) => {
  button.addEventListener('click', () => showView(button.dataset.authView));
});
document.querySelectorAll('[data-auth-close]').forEach((button) => {
  button.addEventListener('click', closeAuth);
});

document.getElementById('login-form').addEventListener('submit', (event) => {
  event.preventDefault();
  submitAuthForm(event.currentTarget, '/api/auth/login');
});

document.getElementById('register-form').addEventListener('submit', (event) => {
  event.preventDefault();
  submitAuthForm(event.currentTarget, '/api/auth/register');
});

document.getElementById('logout-button').addEventListener('click', async () => {
  const button = document.getElementById('logout-button');
  button.disabled = true;
  showMessage();

  try {
    await request('/api/auth/logout', {
      method: 'POST',
      body: JSON.stringify({}),
    });
    updateAuthUI(null);
    closeAuth();
  } catch (error) {
    showMessage(error.message);
  } finally {
    button.disabled = false;
  }
});

authDialog.addEventListener('click', (event) => {
  if (event.target === authDialog) closeAuth();
});

authDialog.addEventListener('close', () => {
  document.body.classList.remove('overflow-hidden');
});

loadSession();
