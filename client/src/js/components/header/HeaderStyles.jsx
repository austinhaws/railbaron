export default {
    header: {
        width: '100%',
        display: 'flex',
        height: '80px',
        justifyContent: 'center',
        paddingTop: '10px',
    },
    header__squidee: {
        paddingTop: '5px',
        height: '80px',
        display: 'flex',
        flexDirection: 'column',
        cursor: 'pointer',
        textAlign: 'center',
        width: '100px',
        alignItems: 'center',
        paddingRight: '15px',

        '& img': {
            width: '40px',
        },
    },
    header__squidee__rpggenerator: {
        color: '#FFC045',
        fontSize: '.8em',
    },
    header__title: {
        textAlign: 'center',
        '& img': {
            width: '400px',
        },
    },
};
