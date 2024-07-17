import {ref} from "vue";

export const en = {
    'auth': {
        'email': 'Email',
        'password': 'Password',
        'remember_me': 'Remember me',
        'login': 'Log in',

        'profile': 'Profile',
        'logout': 'Log Out'
    },
    'admin': {
        'lottery': 'Lottery',
        'lotteries': 'Lotteries',
        'lottery_create': 'Create lottery',
        'prizes': 'Prizes',
        'prize_create': 'Create prize',
        'lazada-lottery-table': 'Lazada lottery',
    }
};

export const th = {
    'auth': {
        'email': 'thEmail',
        'password': 'thPassword',
        'remember_me': 'thRemember me',
        'login': 'thLog in',

        'profile': 'thProfile',
        'logout': 'thLog Out'
    },
    'admin': {
        'lottery': 'thLottery',
        'lotteries': 'thLotteries',
        'lottery_create': 'thCreate lottery',
        'prizes': 'thPrizes',
        'prize_create': 'thCreate prize',
        'lazada-lottery-table': 'thLazada lottery',
    }
};

export const lang = ref(localStorage.getItem('lang') ?? 'en');

export function setLang(newLang) {
    lang.value = newLang;
    localStorage.setItem('lang', newLang)
}

export function trans(path) {
    let dictionary = en;

    if (lang.value === 'th') {
        dictionary = th;
    }

    return getTransByKey(dictionary, path);
}

function getTransByKey(dictionary, key)
{
    let keys = key.split('.');

    if (keys.length > 1) {
        let firstKey = keys[0];
        let otherKeys = keys.slice(1, keys.length);

        return getTransByKey(dictionary[firstKey], otherKeys.join('.'))
    } else {
        return dictionary[key];
    }
}
