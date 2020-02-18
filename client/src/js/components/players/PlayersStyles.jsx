export default {
    players__container: {
    },
    player__container: {
        marginBottom: '33px',
        paddingBottom: '33px',
        borderBottom: '1px solid black',
        '& svg': {
            width: '30px',
            strokeWidth: '3px',
            stroke: 'black',
            strokeLinejoin: "round",
        },
        '& svg:hover': {
            strokeWidth: '5px',
            cursor: 'pointer',
        },
    },
    player__container__name: {
        fontSize: '2.5em',
        flex: 1,
    },

    payout__container: {
        flex: 1,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
    },
    payout__container__payout: {
        marginBottom: '7px',
        fontSize: '1.25em',
    },
    payout__container__arrow: {
        stroke: 'black',
        fill: 'none',
    },

    player_city__container: {
        display: 'flex',
        alignItems: 'center',
        '& > *': {
            margin: '0 4px',
        },
    },
    player_city__container_left: {
        flexDirection: 'row-reverse',
    },

    player__container__player: {
        display: 'flex',
        alignItems: 'center',
        marginBottom: '13px',
        '& > *': {
            margin: '0 4px',
        },
    },

    player__container__cities: {
        display: 'flex',
        '& svg': {
            width: '25px',
        },
        '& > div:nth-child(1)': {
            width: '40%',
        },
        '& > div:nth-child(3)': {
            width: '40%',
            textAlign: 'right',
        },
    },
    player_city__container__name: {
        fontSize: '1.5em',
        flex: 1,
    },
    player_city__container__pencil: {

    },
    player_city__container__dice__border: {
        stroke: 'black',
        fill: 'transparent',
    },
    player_city__container__dice__pip: {
        stroke: 'black',
        fill: 'black',
    },
};
