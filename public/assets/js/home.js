// Vérifie si l'URL contient une ancre
if (window.location.hash) {
    const anchor = window.location.hash.substring(1); // Récupère l'ancre sans le symbole #
    
    // Redirige vers la même page avec l'ancre comme paramètre GET
    window.location.href = window.location.pathname + "?anchor=" + encodeURIComponent(anchor);
}