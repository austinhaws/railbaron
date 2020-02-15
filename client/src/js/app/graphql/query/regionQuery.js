import regionType from "../type/regionType";

export default regionId => `
    regions ${regionId ? `(id: ${regionId})` : ''} {
        ${regionType()}
    }
`
;
