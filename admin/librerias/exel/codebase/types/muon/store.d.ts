import { IFormula, IConfig, IMathStore, cellId, cellValue, parseContext, placeholders } from "./types";
declare type execCycleTracker = {
    [key: number]: number;
};
export declare class Store implements IMathStore {
    private _setter;
    private _getter;
    private _context;
    private _parser;
    private _printer;
    private _data;
    private _triggers;
    private _parseContext;
    private _err_handler;
    private _holders;
    constructor(cfg: IConfig);
    setValue(id: cellId, value?: cellValue, type?: number, silent?: boolean): void;
    clean(id: cellId): void;
    getValue(id: cellId): cellValue;
    setPlaceholder(name: string, value: cellValue | placeholders): void;
    getPlaceholder(name: string): cellValue | placeholders;
    setMath(id: number, text: string, ctx?: parseContext, silent?: boolean): void;
    refresh(id: cellId): void;
    getMath(id: number): IFormula;
    trigger(cId: number, ctx?: execCycleTracker): void;
    _setMathAt(id: number, raw: IFormula): number;
    _removeTriggers(cId: number, next: IFormula): boolean;
    parse(text: string, ctx?: parseContext): IFormula;
    exec(text: string, ctx?: parseContext): cellValue;
    each(cb: (k: number, obj: IFormula) => void): void;
    setLogger(handler: (e: Error) => void): void;
    _setErr(t: IFormula, err?: Error): cellValue;
    _exec(t: IFormula): cellValue;
    toString(f: IFormula, ctx?: parseContext): string;
    regenerate(id: number, remove?: boolean, ctx?: parseContext): void;
    recalculate(broken: boolean, ctx: parseContext): void;
    _generate(text: string, ctx: parseContext, prev?: IFormula): IFormula;
    _execAndTrigger(cId: cellId, ctx?: execCycleTracker): boolean;
    debug(text: string): void;
    transpose(id: number, dr: number, dc: number, ctx?: parseContext): void;
    transposeMath(raw: string | IFormula, dx: number, dy: number, ctx?: parseContext): string;
    _transpose(raw: IFormula, r: number, c: number, dr: number, dc: number, ctx: parseContext): IFormula;
}
export {};
