import playerType from "../type/playerType";
import {includeIfNotUndefined} from "dts-react-common";

export default (player, gamePhrase) => `
  savePlayer(player: {
        ${includeIfNotUndefined('id', player.id)}
        ${includeIfNotUndefined('name', player.name)}
        ${includeIfNotUndefined('tawColor', player.tawColor)}
        ${includeIfNotUndefined('homeCityId', player.homeCityId)}
        ${includeIfNotUndefined('toCityId', player.toCityId)}
        ${includeIfNotUndefined('fromCityId', player.fromCityId)}
      },
      gamePhrase: """${gamePhrase}"""
  ) {
    ${playerType()}
  }
`;
