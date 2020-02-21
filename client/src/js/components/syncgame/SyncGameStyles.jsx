export default {
    sync_game: {

    },
    sync_game__title: {
        textAlign: 'center',
        fontSize: '3em',
        marginBottom: '11px',
    },
    sync_game__blurb: {
        marginBottom: '11px',
    },
    sync_game__label: {
        fontSize: '2em',
        marginBottom: '3px',
    },
    sync_game__input: {
        marginBottom: '17px',
    },
    sync_game__buttons: {
        display: 'flex',
        justifyContent: 'space-around',
        padding: '22px 0',

        '& div': {
            fontSize: '2em',

            '&:hover': {
                cursor: 'pointer',
                fontSize: '2.5em',
                position: 'relative',
                top: '-3px',
                left: '-3px',
            }
        },
    },
    sync_game__buttons__done: {
    },
    sync_game__buttons__done__disabled: {
        color: '#7a7a7a',
        '&:hover': {
            cursor: 'default !important',
            fontSize: '2em !important',
            top: '0 !important',
            left: '0 !important',
        },
    },
    sync_game__game_exists: {
        textAlign: 'center',
        fontSize: '2em',
        margin: '23px 0 3px',
    },
    sync_game__game_exists__exists: {
        color: '#59cb3f',
    },
    sync_game__game_exists__not_exists: {
        color: '#cc0000',
    },
};
