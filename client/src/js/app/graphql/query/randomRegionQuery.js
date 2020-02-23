import regionType from "../type/regionType";

export default () => `
  randomRegion {
    ${regionType(false)}
  }
`
;
