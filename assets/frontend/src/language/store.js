import { writable } from 'svelte/store';

export const currentLanguage = writable('de');

export const translations = writable({
    de: '/de',
    en: '/en'
});
