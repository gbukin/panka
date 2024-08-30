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
    let translatableDatas = $("[data-translation-value]");

    for (const translatableItem of translatableItems) {
        translatableItem.innerText = trans(translatableItem.dataset.translationKey);
    }

    for (const translatableData of translatableDatas) {
        translatableData.setAttribute('data-value', transAlt(translatableData.dataset.translationValue));
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

const transAlt = (key) => {
    if (currentLang === 'en') {
        return enAlt[key];
    } else {
        return thAlt[key];
    }
}


const en = {
    /* -- MENU -- */
    'about_us': 'ABOUT US',
    'our_flavours': 'OUR FLAVOURS',
    'premium_quality': 'PREMIUM QUALITY',
    'lazada_lottery': 'LAZADA 11/11',
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
    'about_us': 'เกี่ยวกับเรา',
    'our_flavours': 'รสชาติต่าง ๆ ของเรา',
    'premium_quality': 'คุณภาพระดับพรีเมียม',
    'lazada_lottery': 'ปังค่ะล็อตเตอรี่11/11',
    'contacts': 'ช่องทางติดต่อเรา',
    /* ---------- */

    /* -- BODY -- */
    'about_us_first_part': '”ปังค่ะ” นำเสนอรสชาติอันน่าทึ่งที่แม้แต่นักชิมอาหารที่พิถีพิถันที่สุดก็จะพึงพอใจอย่างแน่นอน',
    'about_us_second_part': 'ขอเชิญทุกท่านเข้าสู่โลกมหัศจรรย์ของ "ปังค่ะ" มาร่วมเป็นส่วนหนึ่งของการเดินทางแห่งรสชาติที่สร้างแรงบันดาลใจของเรา!',
    'premium_quality_first_part': 'เราภาคภูมิใจที่เป็นเจ้าแรกในประเทศไทยที่นำเสนอขนมปังกรอบคุณภาพระดับพรีเมียมซึ่งมี หลากหลายรสชาติให้เลือกสรร',
    'premium_quality_second_part': 'สิ่งที่ทำให้เราแตกต่างอย่างแท้จริงคือความหลงใหลและความทุ่มเทในการรังสรรค์ของเรา ขนมปังกรอบทุกชิ้นทำด้วยความใส่ใจในรายละเอียดโดยทีมงานมืออาชีพที่มีทักษะของเรา',
    /* ---------- */
};

const enAlt = {
    'bbq': 'BBQ',
    'cheese': 'CHEESE FLAVOUR',
    'crab': 'KING CRAB',
    'meat': 'JELLY MEAT WITH HORSERADISH',
    'salmon': 'SMOKED SALMON',
    'onion': 'SOUR CREAM & ONION',
    'tom_yum': 'TOM YUM',
    'ajika': 'AJIKA SAUSE',
}

const thAlt = {
    'bbq': 'บาร์บีคิว',
    'cheese': 'ชีส',
    'crab': 'รสปูยักษ์',
    'meat': 'เจลลี่มีทและฮอร์ทเรดิข',
    'salmon': 'แซลมอลรมควัน',
    'onion': 'ซาวร์ครีมและหัวหอม',
    'tom_yum': 'ต้มยำ',
    'ajika': 'ซอสมะเขือเทศผสมเครื่องเทศรสเผ็ด',
}
