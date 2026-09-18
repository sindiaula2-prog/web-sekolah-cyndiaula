// ================= LOGIN PAGE INTERACTIONS =================
document.addEventListener('DOMContentLoaded', function () {
  const roleSwitch = document.getElementById('roleSwitch');
  if (!roleSwitch) return;

  const roleButtons   = roleSwitch.querySelectorAll('.role-btn');
  const roleIndicator = roleSwitch.querySelector('.role-indicator');
  const roleInput     = document.getElementById('roleInput');
  const usernameLabel = document.getElementById('usernameLabel');

  const labels = {
    siswa: 'NIS / Username',
    guru:  'NIP / Username',
    admin: 'Username Admin'
  };

  roleButtons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
      roleButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      roleIndicator.style.transform = `translateX(${index * 100}%)`;
      roleInput.value = btn.dataset.role;
      usernameLabel.textContent = labels[btn.dataset.role];
    });
  });

  const toggleBtn = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  if (toggleBtn && passwordInput) {
    toggleBtn.addEventListener('click', () => {
      const isHidden = passwordInput.type === 'password';
      passwordInput.type = isHidden ? 'text' : 'password';
      toggleBtn.querySelector('.eye-open').style.display = isHidden ? 'none' : 'block';
      toggleBtn.querySelector('.eye-closed').style.display = isHidden ? 'block' : 'none';
    });
  }

  const form = document.getElementById('loginForm');
  if (form) {
    const submitBtn = form.querySelector('.btn-submit');
    form.addEventListener('submit', () => {
      submitBtn.style.opacity = '.75';
      submitBtn.style.pointerEvents = 'none';
      submitBtn.querySelector('span').textContent = 'Memproses...';
    });
  }
});