declare type IRawCode = number[];
interface IFormula {
    code: IRawCode;
    source: string;
    exec: execFunction;
    triggers: number[];
    broken: number;
}
export interface execContext {
    v: valueGetter;
    r: rangeGetter;
    m: {
        [key: string]: mathFunction;
    };
    n: namedGetter;
}
declare type cellValue = number | string;
declare type namedGetter = (x: string) => cellValue;
declare type valueGetter = (x: number, y: number) => cellValue;
declare type valueSetter = (x: number, y: number, value: cellValue) => void;
declare type rangeGetter = (x1: number, y1: number, x2: number, y2: number) => cellValue[];
declare type mathArgument = cellValue | cellValue[];
declare type mathFunction = (...x: mathArgument[]) => cellValue;
declare type execFunction = (context: execContext) => cellValue;
declare type cellId = number;
declare type maybeNumber = boolean | number;
interface IParser {
    parse: (code: string) => IFormula;
    position: (buffer: number[], code: string) => void;
}
interface IGenerator {
    generate: (x: IFormula) => void;
}
interface IConfig {
    get: valueGetter;
    set: valueSetter;
}
export { IRawCode, IConfig, IFormula, valueGetter, valueSetter, execFunction, cellId, IParser, IGenerator, mathArgument, mathFunction, cellValue, maybeNumber, };
declare const T_TEXT = 1;
declare const T_PLACEHOLDER = 2;
declare const T_ERROR = 3;
declare const T_METHOD = 4;
declare const T_PAGE = 5;
declare const T_NAME = 6;
declare const T_ARG = 7;
declare const T_RANGE = 8;
declare const T_DATA = 9;
declare const T_OPERATOR = 10;
declare const T_NUMBER = 11;
export { T_TEXT, T_OPERATOR, T_NUMBER, T_METHOD, T_PAGE, T_ERROR, T_PLACEHOLDER, T_NAME, T_ARG, T_RANGE, T_DATA, };
declare const E_PARSE = "#ERROR";
declare const E_EXEC = "#ERROR";
declare const ERR_EXEC = -1;
declare const ERR_PARSE = 1;
declare const ERR_REF = 3;
export { E_PARSE, E_EXEC, ERR_EXEC, ERR_PARSE, ERR_REF };
export interface IValue {
    value: cellValue;
    style?: number;
    format?: number;
    flags?: number;
}
