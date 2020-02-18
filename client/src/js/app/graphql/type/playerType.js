import cityType from "./cityType";

export default () => `
    id
    tawColor
    name

    payout {
        payout
    }

    homeCity {
        ${cityType()}
    }
    toCity {
        ${cityType()}
    }
    fromCity {
        ${cityType()}
    }
`;
