import cityType from "./cityType";

export default () => `
    id
    tawColor
    name

    toCityId
    fromCityId
    homeCityId

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
