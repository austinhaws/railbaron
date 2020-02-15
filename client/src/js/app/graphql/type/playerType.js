import cityType from "./cityType";

export default () => `
    id
    tawColor
    name

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
