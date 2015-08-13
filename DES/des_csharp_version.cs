public class DES {
    public static string DesEncrypt(string encryptString, string encrptKey)
    {
        if (string.IsNullOrEmpty(encrptKey)) encrptKey = Key;
        byte[] keyBytes = Encoding.UTF8.GetBytes(encrptKey);
        byte[] keyIV = keyBytes;
        byte[] inputByteArray = Encoding.UTF8.GetBytes(encryptString);
        DESCryptoServiceProvider provider = new DESCryptoServiceProvider();
        MemoryStream mStream = new MemoryStream();
        CryptoStream cStream = new CryptoStream(mStream, provider.CreateEncryptor(keyBytes, keyIV), CryptoStreamMode.Write);
        cStream.Write(inputByteArray, 0, inputByteArray.Length);
        cStream.FlushFinalBlock();
        return Convert.ToBase64String(mStream.ToArray());
    }
}
