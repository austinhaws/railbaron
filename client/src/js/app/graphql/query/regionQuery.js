import regionType from "../type/regionType";

export default (regionId, includeCities) => `
    regions ${regionId ? `(id: ${regionId})` : ''} {
        ${regionType(includeCities)}
    }
`
;
