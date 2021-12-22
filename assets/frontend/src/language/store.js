import { writable } from 'svelte/store';

export const currentLanguage = writable('de');

export const translation = writable({
    title: 'EN',
    href: '/en'
});
