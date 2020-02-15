import cityType from "../type/cityType";

export default cityId => `
    cities ${cityId ? `(id: ${cityId})` : ''} {
        ${cityType()}
    }
`
;
