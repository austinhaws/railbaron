import regionType from "../type/regionType";

export default regionId => `
  randomRegion {
    ${regionType()}
  }
`
;
