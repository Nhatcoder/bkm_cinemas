export const randomColor = (value: any) => {
  const hashCode = (str: string) => {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
      hash = (Math.imul(31, hash) + str.charCodeAt(i)) | 0;
    }
    return hash;
  };

  const colorIndex = hashCode(value) % 10;
  const colors = [
    '#FF69B4', // màu hồng
    '#33CC33', // màu xanh lá cây
    '#6666CC', // màu xanh da trời
    '#CC3333', // màu đỏ
    '#CCCC33', // màu vàng
    '#33CCCC', // màu xanh biển
    '#CC66CC', // màu tím
    '#66CC33', // màu xanh lá cây nhạt
    '#3333CC', // màu xanh da trời đậm
    '#CC9999' // màu hồng nhạt
  ];

  return colors[colorIndex];
};
