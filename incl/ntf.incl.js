
const ntf = document.getElementById("ntfbar");
const ntfTE = document.getElementById("ntfSpan");

const queryString = window.location.search;
console.log(queryString);

const urlParams = new URLSearchParams(queryString);

const ntfText = urlParams.get('ntf')

if (ntfText == null) {
    ntf.style.display = "none";
} else {
    ntf.style.display = "flex";
    switch (ntfText) {
        case 'successCodeRedeem':
            ntfTE.innerHTML = "Your Premium gift code has been redeemed.";
            break;
        case 'noSupplyCode':
            ntfTE.innerHTML = "Please supply a valid gift code.";
            break;
        case 'invalidGiftCode':
            ntfTE.innerHTML = "The gift code you supplied is not valid.";
            break;
    }
}

function hideNotification() {
    ntf.style.display = "none";
}