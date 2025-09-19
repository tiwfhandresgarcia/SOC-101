// Marca de progreso simple con localStorage
(function(){
  const cards = document.querySelectorAll('.card');
  cards.forEach(c=>{
    const key = c.getAttribute('data-key');
    const dot = c.querySelector('.progress');
    if(localStorage.getItem(key)==='done'){ dot.classList.add('done'); }
    c.addEventListener('auxclick', e=>{
      // middle-click para marcar como hecho/no hecho (atajo útil)
      if(e.button===1){
        const v = localStorage.getItem(key)==='done' ? null : 'done';
        if(v){ localStorage.setItem(key,'done'); dot.classList.add('done'); }
        else { localStorage.removeItem(key); dot.classList.remove('done'); }
        e.preventDefault();
      }
    });
  });

  // Toggle tema
  const btn = document.getElementById('toggleTheme');
  const label = document.getElementById('themeLabel');
  function applyTheme(){
    const t = localStorage.getItem('theme') || 'dark';
    document.body.classList.toggle('light', t==='light');
    label.textContent = t==='light' ? 'Claro' : 'Oscuro';
  }
  btn?.addEventListener('click', e=>{
    e.preventDefault();
    const t = localStorage.getItem('theme')==='light' ? 'dark' : 'light';
    localStorage.setItem('theme', t);
    applyTheme();
  });
  applyTheme();

  // Etiqueta de modo (demo)
  const modeLabel = document.getElementById('modeLabel');
  modeLabel.textContent = 'Principiante';
})();
