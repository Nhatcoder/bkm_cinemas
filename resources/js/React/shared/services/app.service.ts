import ApiBase from '../Api';

class AppService {
  private static instance: any;

  /* eslint-disable-next-line @typescript-eslint/no-empty-function */
  private constructor() {}

  public static getInstance(): AppService {
    if (!this.instance) {
      this.instance = new AppService();
    }
    return this.instance;
  }

  public getTodos() {
    return ApiBase.get('/todos');
  }
}

export default AppService;
