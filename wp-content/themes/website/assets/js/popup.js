let popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");

let unlock = true;

const timeout = 200;

function isWebPSupported(callback) {
    var canvas = document.createElement('canvas');
    var isSupported = canvas.toDataURL('image/webp').indexOf('data:image/webp') === 0;
    callback(isSupported);
}

updatePopupLinks();
function updatePopupLinks() {
    if (popupLinks.length > 0) {
        for (let index = 0; index < popupLinks.length; index++) {
            const popupLink = popupLinks[index];
            popupLink.addEventListener("click", function (e) {
                const popupName = popupLink.getAttribute('href').replace('#', '');
                const curentPopup = document.getElementById(popupName);
                popupOpen(curentPopup);
                e.preventDefault();
            });
        }
    }
}

const popupCloseIcon = document.querySelectorAll('.popup-close-trigger');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));

            e.preventDefault();
        });
    }
}

function popupOpen(curentPopup) {
    // console.log('curentPopup', curentPopup);

    if (curentPopup && unlock) {
        const popupActive = document.querySelectorAll('.popup.open');
        if (popupActive.length) {
            // popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        curentPopup.classList.add('open');
        curentPopup.addEventListener("click", function (e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose(popupActive, doUnlock = true) {
    // console.log('popupActive', popupActive);
    if (!popupActive) {
        document.querySelectorAll('.popup.open').forEach((activePopup) => {
            activePopup.classList.remove('open');
        });
    }

    if (popupActive.classList.contains('video-popup')) {
        videoPlayer.pause();
    }

    if (unlock) {
        popupActive?.classList.remove('open');
        // setTimeout(() => {
        //     if (document.querySelector('.form-sending')) {
        //         document.querySelector('.form-sending').classList.add('hidden');
        //     }
        //     if (document.getElementById('form')) {
        //         document.getElementById('form').classList.remove('hidden');
        //     }
        // }, 2000);

        if (doUnlock && document.querySelectorAll('.popup.open').length < 1) {
            bodyUnLock();
        }
    }
}

function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = lockPaddingValue;
        }
    }

    // Update the indentation of the question-block
    const questionBlock = document.querySelector('.question-block');
    if (questionBlock) {
        questionBlock.style.right = `calc(0px + ${lockPaddingValue})`;
    }

    body.style.paddingRight = lockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

function bodyUnLock() {

    setTimeout(function () {
        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRight = '0px';
            }
        }

        // Remove the indentation of the question-block
        const questionBlock = document.querySelector('.question-block');
        if (questionBlock) {
            questionBlock.style.right = '0px';
        }

        body.style.paddingRight = '0px';
        body.classList.remove('lock');
    }, timeout);

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

(function () {
    if (!Element.prototype.closest) {
        Element.prototype.closest = function (css) {
            var node = this;
            while (node) {
                if (node.matches(css)) return node;
                else node = node.parentElement;
            }
            return null;
        };
    }
})();
(function () {
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector;
    }
})();
