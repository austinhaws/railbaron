import playerType from "../type/playerType";
import {includeIfNotUndefined} from "dts-react-common";
import gamePhrase from "../util/gamePhrase";

export default player => `
  savePlayer(player: {
        ${includeIfNotUndefined('id', player.id)}
        ${includeIfNotUndefined('name', player.name)}
        ${includeIfNotUndefined('tawColor', player.tawColor)}
        ${includeIfNotUndefined('homeCityId', player.homeCityId)}
        ${includeIfNotUndefined('toCityId', player.toCityId)}
        ${includeIfNotUndefined('fromCityId', player.fromCityId)}
      },
      gamePhrase: """${gamePhrase()}"""
  ) {
    ${playerType()}
  }
`;
