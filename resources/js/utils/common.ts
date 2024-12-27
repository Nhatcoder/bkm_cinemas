import domtoimage from 'dom-to-image';

export const domToImage = async ($element: HTMLElement): Promise<string> => {
  return new Promise((resolve, reject) => {
    domtoimage.toPng($element)
      .then((dataUrl: string) => {
        resolve(dataUrl);
      })
      .catch((error: any) => {
        console.error('dom-to-image failed', error);
        reject(error);
      });
  });
}

export const domToBlob = async ($element: HTMLElement): Promise<Blob> => {
  return new Promise((resolve, reject) => {
    domtoimage.toBlob($element)
      .then((blob: Blob) => {
        resolve(blob);
      })
      .catch((error: any) => {
        console.error('dom-to-image failed', error);
        reject(error);
      });
  });
}

export const downloadBlob = (blob: Blob, filename: string): void => {
  const url = URL.createObjectURL(blob);
  const link = document.createElement('a');
  link.href = url;
  link.download = filename;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  URL.revokeObjectURL(url);
}
export const redirectTo = (url: string, options?: any): void => {
  window.location.href = route(url, options);
}

export const redirect = (url?: string) => {
  if (url) {
    window.location.href = url;
  }
  return {
    to: (url: string, options?: any) => {
      if (options) {
        const params = new URLSearchParams(options);
        url += (url.includes('?') ? '&' : '?') + params.toString();
      }
      window.location.href = url;
    },
    back: () => {
      window.history.back();
    },
    forward: () => {
      window.history.forward();
    },
    reload: () => {
      window.location.reload();
    },
    pushState: (data: any, title: string, url?: string) => {
      window.history.pushState(data, title, url);
    },
    replaceState: (data: any, title: string, url?: string) => {
      window.history.replaceState(data, title, url);
    },
    getParams: () => {
      return new URLSearchParams(window.location.search);
    },
    setParams: (params: Record<string, string>) => {
      const searchParams = new URLSearchParams(window.location.search);
      Object.entries(params).forEach(([key, value]) => {
        searchParams.set(key, value);
      });
      window.history.replaceState(null, '', `?${searchParams.toString()}`);
    },
    openInNewTab: (url: string) => {
      window.open(url, '_blank');
    },
    isExternalUrl: (url: string) => {
      return new URL(url, window.location.origin).origin !== window.location.origin;
    }
  }
}

export const price = (price: any, currency: string = 'VND') => {
  price = parseInt(price);
  return new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: currency,
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(price);
}