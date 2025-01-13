'use strict'

const container = document.getElementById('container')

const moveOverlay = () => container.classList.toggle('move')

document.getElementById('open-login').addEventListener('click', moveOverlay)
document.getElementById('open-register').addEventListener('click', moveOverlay)

document.getElementById('open-register-mobile').addEventListener('click', moveOverlay)
document.getElementById('open-login-mobile').addEventListener('click', moveOverlay)

