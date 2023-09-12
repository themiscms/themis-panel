
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
            console.log("Your Premium gift code has been redeemed.");
    }
}

function hideNotification() {
    ntf.style.display = "none";
}