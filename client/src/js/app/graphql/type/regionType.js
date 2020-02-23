import cityType from "./cityType";

export default includeCities => `
    id
    name
    abbreviation
    ${
        includeCities ? `cities {${cityType()}}`: ''
    }
`;
