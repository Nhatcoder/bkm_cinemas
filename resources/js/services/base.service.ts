export class BaseService {
  private static instance: BaseService;
  protected constructor() {}

  public static getInstance(): any {
    if (!this.instance) {
      this.instance = new this();
    }
    return this.instance;
  }
}
