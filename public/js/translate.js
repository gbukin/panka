let currentLang = localStorage.getItem('translation') ?? 'en';

function setLang(lang) {
    localStorage.setItem('translation', lang);
    currentLang = lang;

    if (lang === 'en') {
        document.getElementById('langEn').classList.add('active');
        document.getElementById('langEnHead').classList.add('active');
        document.getElementById('langTh').classList.remove('active');
        document.getElementById('langThHead').classList.remove('active');
    } else {
        document.getElementById('langEn').classList.remove('active');
        document.getElementById('langEnHead').classList.remove('active');
        document.getElementById('langTh').classList.add('active');
        document.getElementById('langThHead').classList.add('active');
    }

    let translatableItems = $("[data-translation-key]");

    for (const translatableItem of translatableItems) {
        translatableItem.innerText = trans(translatableItem.dataset.translationKey);
    }
}

const getCurrentLang = () => {
    return currentLang;
}

const trans = (key) => {
    if (currentLang === 'en') {
        return en[key];
    } else {
        return th[key];
    }
}


const en = {
    /* -- MENU -- */
    'about_us': 'ABOUT US',
    'our_flavours': 'OUR FLAVOURS',
    'premium_quality': 'PREMIUM QUALITY',
    'contacts': 'CONTACTS',
    /* ---------- */

    /* -- BODY -- */
    'about_us_first_part': '"PANKA" offers amazing flavours that will definitely satisfy even the most discerning gourmets.',
    'about_us_second_part': 'We invite you to the amazing world of "PANKA". Become a part of our inspiring taste journey!',
    'premium_quality_first_part': 'We take pride in being the first in Thailand to offer such high-quality croutons in various flavour compositions.',
    'premium_quality_second_part': 'But what truly sets us apart is our passion and dedication to our craft. Each batch of croutons is made with care and attention to detail by our team of skilled professionals.',
    /* ---------- */
};

const th = {
    /* -- MENU -- */
    'about_us': 'TH ABOUT US',
    'our_flavours': 'TH OUR FLAVOURS',
    'premium_quality': 'TH PREMIUM QUALITY',
    'contacts': 'TH CONTACTS',
    /* ---------- */

    /* -- BODY -- */
    'about_us_first_part': 'TH "PANKA" offers amazing flavours that will definitely satisfy even the most discerning gourmets.',
    'about_us_second_part': 'TH We invite you to the amazing world of "PANKA". Become a part of our inspiring taste journey!',
    'premium_quality_first_part': 'TH We take pride in being the first in Thailand to offer such high-quality croutons in various flavour compositions.',
    'premium_quality_second_part': 'TH But what truly sets us apart is our passion and dedication to our craft. Each batch of croutons is made with care and attention to detail by our team of skilled professionals.',
    /* ---------- */
};
