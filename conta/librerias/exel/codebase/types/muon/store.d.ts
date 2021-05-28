import { IFormula, IConfig, cellValue } from "./types";
declare type execCycleTracker = {
    [key: number]: number;
};
export declare class Store {
    private _setter;
    private _getter;
    private _context;
    private _parser;
    private _printer;
    private _data;
    private _triggers;
    private _cache;
    constructor(cfg: IConfig);
    position(text: string): number[];
    setValue(text: string, value?: cellValue, silent?: boolean): void;
    setValueAt(row: number, column: number, value?: number | string, silent?: boolean): void;
    getValue(text: string): cellValue;
    getValueAt(row: number, column: number): cellValue;
    setMath(position: string, text: string, silent?: boolean): void;
    setMathAt(row: number, column: number, text: string, silent?: boolean): void;
    getMath(text: string): IFormula;
    getMathAt(row: number, column: number): IFormula;
    _setMathAt(row: number, column: number, raw: IFormula): number;
    _removeTriggers(cId: number, next: IFormula): boolean;
    parse(text: string): IFormula;
    exec(text: string): cellValue;
    _exec(t: IFormula): cellValue;
    toString(f: IFormula): string;
    _generate(text: string, raw: IFormula): IFormula;
    _execAndTrigger(cId: number, ctx?: execCycleTracker): boolean;
    _trigger(cId: number, ctx?: execCycleTracker): void;
    debug(text: string): void;
    transpose(text: string, dr: number, dc: number): void;
    transposeAt(r: number, c: number, dr: number, dc: number): void;
    transposeMath(raw: string | IFormula, dx: number, dy: number): string;
    _transpose(raw: IFormula, r: number, c: number, dr: number, dc: number): IFormula;
}
export {};
