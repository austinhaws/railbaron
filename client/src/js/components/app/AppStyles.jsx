const appPadding = 4;

export default {
    app__content: {
        fontFamily: '"Courier New", Courier, monospace',
        maxWidth: '1000px',
        minWidth: '630px',
        display: 'flex',
        flexDirection: 'column',
        margin: '0 auto',
        padding: `${appPadding}px`,
    },
    app__content__container: {
        width: `calc(100% - ${appPadding * 2}px)`,
    },
};
