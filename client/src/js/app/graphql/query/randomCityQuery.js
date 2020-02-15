import cityType from "../type/cityType";

export default regionId => `
    randomCity ${regionId ? `(regionId: ${regionId})` : ''} {
        ${cityType()}
    }
`
;
