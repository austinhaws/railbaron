export default key => ({
    get: defaultValue => localStorage.getItem(key) || defaultValue,
    set: value => localStorage.setItem(key, value),
    remove: () => localStorage.removeItem(key),
});
